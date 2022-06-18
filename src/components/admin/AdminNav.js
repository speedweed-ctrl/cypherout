import React from 'react'
import no from './no.png'
import { Link } from 'react-router-dom'
const AdminNav = () => {
    const sta=window.localStorage.getItem('status')
    const user=window.localStorage.getItem('user')
    console.log(sta)
    if(!user){
        window.location.replace('/login')
    }
  return (
    <div className="lg:flex">
    <div className="lg:w-1/2 xl:max-w-screen-sm">
        
        <div className="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
            <h2 className="text-center font-Avalon text-4xl text-cl font-display font-semibold lg:text-left xl:text-5xl
            xl:text-bold">overseer </h2>
            {sta?
                    <div className="mt-16">
                
                    <div className='mb-5 '>
                        <Link to='/rpart' className='text-center text-3xl font-Avalon text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500'> --&gt;Register participant&lt;--</Link> 
                    </div>
                    <div className='mb-5'>
                       <Link to='/adminH'className='text-center text-3xl font-Avalon  text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500'> --&gt;scan history&lt;--</Link> 
                    </div>
                    <div className='mb-5'>
                       <Link to='/fscan' className='text-center text-3xl font-Avalon  text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500'> --&gt;full scan history&lt;--</Link> 
                    </div>       
            </div>:
            <img src={no}></img>
            }
            
        </div>
    </div>
    <div className="hidden lg:flex items-center justify-center bg-cl flex-1 h-screen">
        <div className="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
           
        </div>
    </div>
</div>
  )
}

export default AdminNav