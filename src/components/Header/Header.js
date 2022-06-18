import React , {useState} from 'react'
import { AiFillRobot,AiOutlineRobot } from 'react-icons/ai'
import { BiLogOut } from 'react-icons/bi'
import { Link } from 'react-router-dom'

const Header = () => {
    const [navBarOpen , setNavBarOpen]=useState(false)
    const logoutHandler=async(e)=>{
        e.preventDefault()
        await window.localStorage.clear()
        window.location.replace('/login')
    }

    var sp=window.location.pathname
    if (sp=='/login'||sp=='/sign'){
        return (
            <></>
        )
    }else{
        return(
            <nav className="flex items-center justify-between flex-wrap bg-cl p-6">
            <div className="flex items-center flex-shrink-0 text-white mr-6">
                <span className="text-2xl font-Avalon text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500  "><Link to='/'> lorem ipsum</Link></span>
            </div>
            <div className="block lg:hidden">
                <button className="flex items-center px-3 py-2 border rounded text-ha border-ha float-left mr-2 "onClick={()=>setNavBarOpen(!navBarOpen)}>
                    {
                        navBarOpen? <AiFillRobot/>:<AiOutlineRobot/>
                    }
                </button>

                <button className="flex items-center px-3 py-2 border rounded text-ha border-ha float-right " onClick={(e)=>logoutHandler(e)}>
                    <BiLogOut/>
                </button>
            </div>
            <div className={navBarOpen? "w-full block flex-grow lg:flex lg:items-center lg:w-auto":"w-full block flex-grow lg:flex lg:items-center lg:w-auto hidden"}>
                <div className="text-sm lg:flex-grow">
                    <Link to='/'  className="text-2xl font-Avalon block mt-4 lg:inline-block lg:mt-0 text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500  4">
                        scan
                    </Link>
                    <Link to='/detail'  className="text-2xl font-Avalon block mt-4 lg:inline-block lg:mt-0 text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500  ">
                        detail
                    </Link>
                    <Link to='/admin'  className="text-2xl font-Avalon block mt-4 lg:inline-block lg:mt-0 text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500  ">
                        Admin
                    </Link>
                </div>
            </div>
           
    </nav>
      )
        
    }
    
}

export default Header