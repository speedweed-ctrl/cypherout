import AdminNav from "./components/admin/AdminNav";
import Login from "./components/auth/Login";
import Register from "./components/auth/Register";
import Header from "./components/Header/Header";
import ScanH from "./components/main/ScanH";
import {  Routes,Route } from 'react-router-dom'
import RegisterPar from "./components/admin/RegisterPar";
import FullH from './components/admin/FullH'
import History from "./components/admin/History";
import Dscanh from './components/admin/Dscanh'
import create from 'zustand';
import Scaner from "./components/main/Scaner";




function App() {
  return (
    <div className="App">
      <Header></Header>
        <Routes>
        <Route path='/' element={<Scaner/>}/>
        <Route path='/login' element={<Login/>}/>
        <Route path='/sign' element={<Register/>}/>
        <Route path='/register' element={<Register/>}/>
        <Route path='/admin' element={<AdminNav/>}/>
        <Route path='/adminH' element={<History/>}/>
        <Route path='/Dscan/:user' element={<Dscanh/>}/>
        <Route path='/rpart' element={<RegisterPar/>}/>
        <Route path='/detail' element={<ScanH/>}/>    
        <Route path='/fscan' element={<FullH/>}/>      
        </Routes>
    </div>
  );
}

export default App;
