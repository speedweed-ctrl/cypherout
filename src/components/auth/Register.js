import axios from 'axios'
import React , {useState} from 'react'


const Register = () => {
    const [user,setUser]=useState('')
    const[name,setname]=useState('')
    const[last,setlast]=useState('')
    const[mail,setmail]=useState('')
    const[passs,setpasss]=useState('')
    const [erm,setErm]=useState(false)

    const submiHandler =async (e)=>{
        e.preventDefault()
        try{
            const {data} = await axios.post('http://127.0.0.1:8000/api/register',{
            first_name:name,
            last_name:last,
            username:user,
            email:mail,
            password:passs,
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
            <span class="block sm:inline">somthing went wrong try again later</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            </span>
          </div>:<></>
        }
    <div className="lg:flex">
                <div className="lg:w-1/2 xl:max-w-screen-sm">
                    
                    <div className="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                        <h2 className="text-center font-Avalon text-4xl text-cl font-display font-semibold lg:text-left xl:text-5xl
                        xl:text-bold">register</h2>
                        <div className="mt-12">
                            <form onSubmit={(e)=>(submiHandler(e))}>
                                <div>
                                    <div className="text-sm font-bold text-gray-700 tracking-wide font-Avalon">first name</div>
                                    <input className="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="text" required placeholder="ur first name" value={name} onChange={(e)=>(setname(e.target.value))}/>
                                </div><br/>
                                <div>
                                    <div className="text-sm font-bold text-gray-700 tracking-wide font-Avalon">last name</div>
                                    <input className="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="text" required placeholder="ur last name" value={last} onChange={(e)=>(setlast(e.target.value))}/>
                                </div><br/>
                                <div>
                                    <div className="text-sm font-bold text-gray-700 tracking-wide font-Avalon">user name</div>
                                    <input className="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="text" required placeholder="have a creative one" value={user} onChange={(e)=>(setUser(e.target.value))}/>
                                </div><br/>
                                <div>
                                    <div className="text-sm font-bold text-gray-700 tracking-wide font-Avalon">email</div>
                                    <input className="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type='email' required placeholder="ur email adress"value={mail} onChange={(e)=>(setmail(e.target.value))}/>
                                </div><br/>
                                <div>
                                    <div className="text-sm font-bold text-gray-700 tracking-wide font-Avalon">password</div>
                                    <input className="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="password" required minLength='8' placeholder="create a password"value={passs} onChange={(e)=>(setpasss(e.target.value))}/>
                                </div><br/>
                                
                                <div className="mt-10">
                                    <button className="bg-cl text-gray-100 p-4 w-full rounded-full tracking-wide
                                    font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-cl
                                    shadow-lg font-Avalon" type='submit'>
                                        Register
                                    </button>
                                </div>
                            </form>
                            <div className="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                                have an existing accout <a className="cursor-pointer text-cl hover:text-cl" href='login'>Log in</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="hidden lg:flex items-center justify-center bg-indigo-100 flex-1 h-screen">
                    <div className="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
                       
                    </div>
                </div>
            </div>
            </>
  )
}

export default Register