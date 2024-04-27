import React from 'react'
import ReactDOM from 'react-dom/client'

import './home.css'

import 'bootstrap/dist/css/bootstrap.min.css';

import { Table as BTable } from 'react-bootstrap';

import {
   Column,
   ColumnDef,
   ColumnFiltersState,
   RowData,
   flexRender,
   getCoreRowModel,
   getFilteredRowModel,
   getPaginationRowModel,
   getSortedRowModel,
   useReactTable,
   ExpandedState,
   getExpandedRowModel,
   Row
 } from '@tanstack/react-table'
 
 import { makeData, Person } from './makeData'
 
 declare module '@tanstack/react-table' {
   //allows us to define custom properties for our columns
   interface ColumnMeta<TData extends RowData, TValue> {
     filterVariant?: 'text' | 'range' | 'select'
   }
 }


 const renderSubComponent = ({ row }: { row: Row<Person> }) => {
   return (
     <pre style={{ fontSize: '10px' }}>
       <code>{JSON.stringify(row.original, null, 2)}</code>
     </pre>
   )
 }



const Home = () => {

   const rerender = React.useReducer(() => ({}), {})[1]

  const [columnFilters, setColumnFilters] = React.useState<ColumnFiltersState>(
    []
  )

  const columns = React.useMemo<ColumnDef<Person, any>[]>(
    () => [
      {
        accessorKey: 'firstName',      
       // cell: info => info.getValue(),
       cell: ({ row, getValue }) => (
         <div
           style={{
             // Since rows are flattened by default,
             // we can use the row.depth property
             // and paddingLeft to visually indicate the depth
             // of the row
             paddingLeft: `${row.depth * 2}rem`,
           }}
         >
           <div>            
             {row.getCanExpand() ? (
               <button
                 {...{
                   onClick: row.getToggleExpandedHandler(),
                   style: { cursor: 'pointer' },
                 }}
               >
                 {row.getIsExpanded() ? '👇' : '👉'}
               </button>
             ) : (
               '🔵'
             )}{' '}
             {getValue<boolean>()}
           </div>
         </div>
       ),
       footer: props => props.column.id
      },
      {
        accessorFn: row => row.lastName,
        id: 'lastName',
        cell: info => info.getValue(),
        header: () => <span>Last Name</span>,
      },
      {
        accessorFn: row => `${row.firstName} ${row.lastName}`,
        id: 'fullName',
        header: 'Full Name',
        cell: info => info.getValue(),
      },
      {
        accessorKey: 'age',
        header: () => 'Age',
        meta: {
          filterVariant: 'range',
        },
      },
      {
        accessorKey: 'visits',
        header: () => <span>Visits</span>,
        meta: {
          filterVariant: 'range',
        },
      },
      {
        accessorKey: 'status',
        header: 'Status',
        meta: {
          filterVariant: 'select',
        },
      },
      {
        accessorKey: 'progress',
        header: 'Profile Progress',
        meta: {
          filterVariant: 'range',
        },
      },
    ],
    []
  )

  const [data, setData] = React.useState<Person[]>(() => makeData(100,5,4))
  const refreshData = () => setData(_old => makeData(100,5,3)) //stress test
  
  //const [expanded, setExpanded] = React.useState<ExpandedState>({})

  const table = useReactTable({
    data,
    columns,
    filterFns: {},
    state: {
      columnFilters,
      //expanded
    },
    getRowCanExpand : ()=> { return true},
    //onExpandedChange: setExpanded,
    //getSubRows: row => row.subRows,
    onColumnFiltersChange: setColumnFilters,
    getCoreRowModel: getCoreRowModel(),
    getFilteredRowModel: getFilteredRowModel(), //client side filtering
    getSortedRowModel: getSortedRowModel(),
    getPaginationRowModel: getPaginationRowModel(),
    //getExpandedRowModel: getExpandedRowModel(),
    debugTable: true,
    debugHeaders: true,
    debugColumns: false,
  })

  return (
   <div className="p-2">
     <BTable striped bordered hover responsive size="sm">
       <thead>
         {table.getHeaderGroups().map(headerGroup => (
           <tr key={headerGroup.id}>
             {headerGroup.headers.map(header => {
               return (
                 <th key={header.id} colSpan={header.colSpan}>
                   {header.isPlaceholder ? null : (
                     <>
                       <div
                         {...{
                           className: header.column.getCanSort()
                             ? 'cursor-pointer select-none'
                             : '',
                           onClick: header.column.getToggleSortingHandler(),
                         }}
                       >
                         {flexRender(
                           header.column.columnDef.header,
                           header.getContext()
                         )}
                         {{
                           asc: ' 🔼',
                           desc: ' 🔽',
                         }[header.column.getIsSorted() as string] ?? null}
                       </div>
                       {header.column.getCanFilter() ? (
                         <div>
                           <Filter column={header.column} />
                         </div>
                       ) : null}
                     </>
                   )}
                 </th>
               )
             })}
           </tr>
         ))}
       </thead>
       <tbody>
         {table.getRowModel().rows.map(row => {
           return (
            <React.Fragment key={row.id}>
             <tr>
               {row.getVisibleCells().map(cell => {
                 return (
                   <td key={cell.id}>
                     {flexRender(
                       cell.column.columnDef.cell,
                       cell.getContext()
                     )}
                   </td>
                 )
               })}
             </tr>
             {row.getIsExpanded() && (
               <tr>
                 {/* 2nd row is a custom 1 cell row */}
                 <td colSpan={row.getVisibleCells().length}>
                   {renderSubComponent({ row })}
                 </td>
               </tr>
             )}
             </React.Fragment>
           )
         })}
       </tbody>
     </BTable>
     <div className="h-2" />
     <div className="flex items-center gap-2">
       <button
         className="border rounded p-1"
         onClick={() => table.setPageIndex(0)}
         disabled={!table.getCanPreviousPage()}
       >
         {'<<'}
       </button>
       <button
         className="border rounded p-1"
         onClick={() => table.previousPage()}
         disabled={!table.getCanPreviousPage()}
       >
         {'<'}
       </button>
       <button
         className="border rounded p-1"
         onClick={() => table.nextPage()}
         disabled={!table.getCanNextPage()}
       >
         {'>'}
       </button>
       <button
         className="border rounded p-1"
         onClick={() => table.setPageIndex(table.getPageCount() - 1)}
         disabled={!table.getCanNextPage()}
       >
         {'>>'}
       </button>
       <span className="flex items-center gap-1">
         <div>Page</div>
         <strong>
           {table.getState().pagination.pageIndex + 1} of{' '}
           {table.getPageCount()}
         </strong>
       </span>
       <span className="flex items-center gap-1">
         | Go to page:
         <input
           type="number"
           defaultValue={table.getState().pagination.pageIndex + 1}
           onChange={e => {
             const page = e.target.value ? Number(e.target.value) - 1 : 0
             table.setPageIndex(page)
           }}
           className="border p-1 rounded w-16"
         />
       </span>
       <select
         value={table.getState().pagination.pageSize}
         onChange={e => {
           table.setPageSize(Number(e.target.value))
         }}
       >
         {[10, 20, 30, 40, 50,100,200].map(pageSize => (
           <option key={pageSize} value={pageSize}>
             Show {pageSize}
           </option>
         ))}
       </select>
     </div>
     <div>{table.getPrePaginationRowModel().rows.length} Rows</div>
     <div>
       <button onClick={() => rerender()}>Force Rerender</button>
     </div>
     <div>
       <button onClick={() => refreshData()}>Refresh Data</button>
     </div>
     <pre>
       {JSON.stringify(
         { columnFilters: table.getState().columnFilters },
         null,
         2
       )}
     </pre>
   </div>
 );
   };

   function Filter({ column }: { column: Column<any, unknown> }) {
      const columnFilterValue = column.getFilterValue()
      const { filterVariant } = column.columnDef.meta ?? {}
    
      return filterVariant === 'range' ? (
        <div>
          <div className="flex space-x-2">
            {/* See faceted column filters example for min max values functionality */}
            <DebouncedInput
              type="number"
              value={(columnFilterValue as [number, number])?.[0] ?? ''}
              onChange={value =>
                column.setFilterValue((old: [number, number]) => [value, old?.[1]])
              }
              placeholder={`Min`}
              className="w-24 border shadow rounded"
            />
            <DebouncedInput
              type="number"
              value={(columnFilterValue as [number, number])?.[1] ?? ''}
              onChange={value =>
                column.setFilterValue((old: [number, number]) => [old?.[0], value])
              }
              placeholder={`Max`}
              className="w-24 border shadow rounded"
            />
          </div>
          <div className="h-1" />
        </div>
      ) : filterVariant === 'select' ? (
        <select
          onChange={e => column.setFilterValue(e.target.value)}
          value={columnFilterValue?.toString()}
        >
          {/* See faceted column filters example for dynamic select options */}
          <option value="">All</option>
          <option value="complicated">complicated</option>
          <option value="relationship">relationship</option>
          <option value="single">single</option>
        </select>
      ) : (
        <DebouncedInput
          className="w-36 border shadow rounded"
          onChange={value => column.setFilterValue(value)}
          placeholder={`Search...`}
          type="text"
          value={(columnFilterValue ?? '') as string}
        />
        // See faceted column filters example for datalist search suggestions
      )
    }
    
    // A typical debounced input react component
    function DebouncedInput({
      value: initialValue,
      onChange,
      debounce = 500,
      ...props
    }: {
      value: string | number
      onChange: (value: string | number) => void
      debounce?: number
    } & Omit<React.InputHTMLAttributes<HTMLInputElement>, 'onChange'>) {
      const [value, setValue] = React.useState(initialValue)
    
      React.useEffect(() => {
        setValue(initialValue)
      }, [initialValue])
    
      React.useEffect(() => {
        const timeout = setTimeout(() => {
          onChange(value)
        }, debounce)
    
        return () => clearTimeout(timeout)
      }, [value])
    
      return (
        <input {...props} value={value} onChange={e => setValue(e.target.value)} />
      )
    }
    
   
   export default Home;