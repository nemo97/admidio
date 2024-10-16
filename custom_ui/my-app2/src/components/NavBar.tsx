// Components/NavBar.js
import { Link } from 'react-router-dom';

const NavBar = () => {
 return (
 <nav>
       <ul>
          <li>
             <Link to="https://bcaa.subhas.dev/adm_program/modules/contacts/contacts.php" >Main Contact</Link>
          </li>
          <li>
             <Link to="https://bcaa.subhas.dev/" >Main Home</Link>
          </li>
          {/* <li>
             <Link to="/about">About</Link>
          </li> */}
          {/* <li>
             <Link to="/products">Products</Link>
          </li> */}
       </ul>
 </nav>
 );
};

export default NavBar;