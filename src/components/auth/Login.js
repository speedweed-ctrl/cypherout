import axios  from 'axios'
import React , {useState} from 'react'


const Login = () => {

    const [user,setUser]=useState('')
    const[pass,setPass]=useState('')
    const [erm,setErm]=useState(false)

      

    const submiHandler =async (e)=>{
        e.preventDefault()
        try{
            const {data} = await axios.post('http://192.168.1.11:8000/api/login',{
            username:user,
            password:pass
        })
        window.localStorage.setItem('user',data._id)
        window.localStorage.setItem('token',data.access)
        window.localStorage.setItem('status',data.isAdmin)
        window.location.replace('/detail')
        console.log(data)
        }catch(error){
            setErm(true)
        }
       
        
    }


  return (
        <>
        {
            erm? <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Holy smokes!</strong>
            <span class="block sm:inline">plz make sure ur login credentials are correct</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            </span>
          </div>:<></>
        }
            <div className="lg:flex">
                <div className="lg:w-1/2 xl:max-w-screen-sm">
                    
                    <div className="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                        <h2 className="text-center font-Avalon text-4xl text-cl font-display font-semibold lg:text-left xl:text-5xl
                        xl:text-bold">Log in</h2>
                        <div className="mt-12">
                            <form onSubmit={(e)=>(submiHandler(e))}>
                                <div>
                                    <div className="text-sm font-bold text-gray-700 tracking-wide font-Avalon">username</div>
                                    <input className="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-cl" type="" required placeholder="user name" value={user} onChange={(e)=>(setUser(e.target.value))}/>
                                </div>
                                <div className="mt-8">
                                    <div className="flex justify-between items-center">
                                        <div className="text-sm font-bold text-gray-700 tracking-wide font-Avalon">
                                            Password
                                        </div>
                                        
                                    </div>
                                    <input className="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-cl" type="password" required minLength='0' placeholder="Enter your password" value={pass} onChange={(e)=>(setPass(e.target.value))}/>
                                </div>
                                <div className="mt-10">
                                    <button className="bg-cl text-gray-100 p-4 w-full rounded-full tracking-wide
                                    font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-cl
                                    shadow-lg font-Avalon" type='submit' >
                                        Log In
                                    </button>
                                </div>
                            </form>
                            <div className="mt-12 text-sm font-display font-semibold text-gray-700 text-center font-Avalon">
                                Don't have an account ? <a className="cursor-pointer text-cl hover:text-cl" href='sign'>Sign up</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="hidden lg:flex items-center justify-center bg-cl flex-1 h-screen">
                    <div className="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
                       
                    </div>
                </div>
            </div>
            </>
        
  )
}

export default Login