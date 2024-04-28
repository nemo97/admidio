import { lazy, Suspense } from 'react';
import { Routes, Route,BrowserRouter } from 'react-router-dom';



const Home = lazy(() => import('./pages/Home'));
const About = lazy(() => import('./pages/About'));
const NavBar = lazy(() => import('./components/NavBar'));


function App() {
  return (
    <>
    <BrowserRouter basename="/custom_ui/build">
    <NavBar></NavBar>
    <Suspense fallback={<div className="container">Loading...</div>}>
      <Routes>	    
        <Route path="/" element={<Home />} />       
        <Route path="/about" element={<About />} />
      </Routes>
    </Suspense>
    </BrowserRouter>
 </>

  );
}

export default App;
