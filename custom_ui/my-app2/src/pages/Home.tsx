import React from 'react'
import ReactDOM from 'react-dom/client'

import './home.css'

import 'bootstrap/dist/css/bootstrap.min.css';

import { Alert, Table as BTable, Card, CardBody, Table } from 'react-bootstrap';


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
 
 //import { makeData, Person } from './makeData'
 import { MemberInfo,getUserData,getUserTokenData,issueSingleUserSendEmail,MemberTokenInfo,JsonResponseUser,JsonResponseUserToken, issueSingleUserToken, undoUserToken, deleteUserToken } from './data';
import { Button } from 'react-bootstrap';

 
 declare module '@tanstack/react-table' {
   //allows us to define custom properties for our columns
   interface ColumnMeta<TData extends RowData, TValue> {
     filterVariant?: 'text' | 'range' | 'select'
   }
 }



 const TokenComponent = ({ row }: { row: Row<MemberInfo> }) => {

  const [data, setData] = React.useState<MemberTokenInfo[]>([]);
  const [message, setMessage] = React.useState<String>('');
  const [errmsg, setErrmsg] = React.useState<String>('');

  React.useEffect(()=>{
    refreshData();
  },[]);
  
  const refreshData = () => {
    getUserTokenData(row.original.member_id).then((data : JsonResponseUserToken)=>{
      //console.log("data",data);
      if(data.result){
        setData(data.result);
      }
      
    });
  }
  const issueMoreToken = (member_id : number) => {
    issueSingleUserToken(member_id).then((data : JsonResponseUserToken) => {
      if(data.error==='Y'){        
        if(data.errorDetails){
          setMessage('');
          setErrmsg(data.errorDetails.join(" , "));
        }          
      }else{
        setMessage("Succesfully Issued.");
        refreshData();
      }
    });
  }
  const sendEmail = (member_id : number) => {
    issueSingleUserSendEmail(member_id).then((data : JsonResponseUserToken) => {
      if(data.error ==='Y'){      
        if(data.errorDetails){
          setMessage('');
          setErrmsg(data.errorDetails.join(" , "));
        }          
      }else{
        setMessage("Succesfully Sent Email.");
        refreshData();
      }
    });
  }
  const openPDF = (member_id : number,member_email: string,mem_uuid : string) => {
    // issueSingleUserToken(member_id).then((data : JsonResponseUserToken) => {
    //   if(data.error==='Y'){        
        
    //   }else{
    //     setMessage("Succesfully Issued.");
    //     refreshData();
    //   }
    // });
    window.open("https://bcaa.subhas.dev/custom_pages/members_details.php?email="+member_email+"&id="+mem_uuid+"","_balnk");
  }
  const deleteToken = (member_id : number,iss_id: number) => {
    deleteUserToken(member_id,iss_id).then((data : JsonResponseUserToken) => {
      if(data.error==='Y'){        
        if(data.errorDetails){
          setMessage('');
          setErrmsg(data.errorDetails.join(" , "));
        }          
      }else{
        setMessage("Succesfully Deleted.");
        refreshData();
      }
    });
  }
  const undoToken = (member_id : number,iss_id: number) => {
    undoUserToken(member_id,iss_id).then((data : JsonResponseUserToken) => {
      if(data.error==='Y'){        
        if(data.errorDetails){
          setMessage('');
          setErrmsg(data.errorDetails.join(" , "));
        }          
      }else{
        setMessage("Succesfully Undo.");
        refreshData();
      }
    });
  }
  const columns = React.useMemo<ColumnDef<MemberTokenInfo, any>[]>(
    () => [
      {
        accessorKey: 'iss_id', 
        header: () => <span></span>,
      },
      {
        accessorKey: 'iss_id',      
        cell: info => info.getValue(),       
        header: () => <span>ID#</span>,
      },
      {        
        accessorKey: 'token_text',
        cell: info => info.getValue(),
        header: () => <span>Token</span>,
      }, 
      {
        accessorKey: 'token_status',
        header: () => <span>Token Status #</span>     
      },
      {
        accessorKey: 'token_status_desc',
        header: 'Status Desc',        
      },  
      {
        accessorKey: 'token_redeem_date',
        header: 'Redeem Date',        
      },     
    ],
    []
  );
  const table = useReactTable({data,
    columns,
    getCoreRowModel: getCoreRowModel()});

   return (
    <div className="container">   
      {message && <Alert variant='success'>{message}</Alert> } 
      {errmsg && <Alert variant='warning'>{errmsg}</Alert> } 
      <div></div>
      <BTable striped bordered hover responsive size="sm">
       <thead>
         {table.getHeaderGroups().map(headerGroup => (
           <tr key={headerGroup.id}>
             {headerGroup.headers.map(header => {
               return (
                 <th key={header.id} colSpan={header.colSpan}>
                   {header.isPlaceholder ? null : (
                     <>
                       <div>
                         {flexRender(
                           header.column.columnDef.header,
                           header.getContext()
                         )}                         
                       </div>                       
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
              <td>
              {row.original.token_status === 'R' &&  <Button variant="danger" onClick={()=> undoToken(row.original.member_id,row.original.iss_id) }>Undo Redeem</Button>} {' '} 
              <Button variant="warning" onClick={()=> deleteToken(row.original.member_id,row.original.iss_id) }>Remove</Button></td>
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
             </React.Fragment>
           )
         })}
       </tbody>
     </BTable>
      <div>
        <Button variant="primary" onClick={refreshData}>Refresh</Button>{' '}
        <Button variant="primary" onClick={()=>issueMoreToken(row.original.member_id)}>Issue 1 Token</Button>{' '}
        <Button variant="info" onClick={()=>sendEmail(row.original.member_id)}>Send Email to User</Button>{' '}
        <Button variant="info" onClick={()=>openPDF(row.original.member_id,row.original.member_email,row.original.mem_uuid)}>Open As PDF</Button>{' '}
      </div>
      { /*
        data.map( t =>{
          return <Card>
            <CardBody>
            <code>{JSON.stringify(t, null, 2)}</code>       
            </CardBody>
          </Card>
        }) */
      }     
     </div>
   )
 }



const Home = () => {

   const rerender = React.useReducer(() => ({}), {})[1]

  const [columnFilters, setColumnFilters] = React.useState<ColumnFiltersState>(
    []
  )

  const columns = React.useMemo<ColumnDef<MemberInfo, any>[]>(
    () => [
      {
        accessorKey: 'member_name',      
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
       header: () => <span>Name</span>,
      },
      {
        accessorFn: row => row.member_email,
        id: 'member_email',
        cell: info => info.getValue(),
        header: () => <span>Email</span>,
      },      
      {
        accessorKey: 'guest_count',
        header: () => <span>Guest Count #</span>     
      },
      {
        accessorKey: 'token_count',
        header: () => <span>Token Count(Redeem Count)</span>     
      },
      {
        accessorKey: 'member_status_desc',
        header: 'Status',
        meta: {
          filterVariant: 'select',
        },
      },     
      {
        accessorKey: 'sent_status',
        header: () => <span>Email Sent Status</span>     
      },
      {
        accessorKey: 'sent_date',
        header: () => <span>Sent Date</span>     
      }
    ],
    []
  )
  const [data, setData] = React.useState<MemberInfo[]>([]);
  React.useEffect(()=>{
    getUserData().then((data : JsonResponseUser)=>{
      //console.log("data",data);
      if(data.result){
        setData(data.result);
      }            
    });
  },[]);

  //const [data, setData] = React.useState<Person[]>(() => makeData(100,5,4))
  const refreshData = () => {
    getUserData().then((data : JsonResponseUser)=>{      
      if(data.result){
        setData(data.result);
      }            
    });
  }
  
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
                   <TokenComponent row={row}/>
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
       <button onClick={() => refreshData()} type="button" className="btn btn-primary">Refresh Data</button>       
     </div>     
     <div style={{'marginTop': '10px'}}>       
       <button onClick={() => refreshData()} type="button" className="btn btn-warning">Send Email to ALL Active Members </button>
     </div>     
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
          <option value="1">Active Only</option>          
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