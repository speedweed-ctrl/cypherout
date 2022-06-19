
import {  Routes,Route } from 'react-router-dom'
import Amd from './Adminsitrations/Amd';
import Nav from './Navbar/Nav';
import Scaner from './qr/Scaner';
import Info from './ticket/Info';





function App() {
  return (
    <div className="App">
      <Nav/>
        <Routes>
          <Route path='/' element={<Scaner/>} />
            <Route path='/admin' element={<Amd/>} />
            <Route path='/qr' element={<Scaner/>} />
            <Route path='/ghazela' element={<Info/>}/>

        </Routes>
    </div>
  );
}

export default App;