
import axios from 'axios';
import React,{useState,useEffect} from 'react'
import { BsUpcScan } from 'react-icons/bs'
import { useParams } from 'react-router-dom'


const ScanH = () => {
    const [data,setData]=useState([])
    const[count,setCount]=useState([])
    const {user}=useParams()
    const token=window.localStorage.getItem('token')
    console.log(user)
    const config = {
        headers: { Authorization: `Bearer ${token} `}
    };
    
    useEffect(()=>{
        const getData=async()=>{
            const {data}= await axios.get(`http://192.168.1.11:8000/api/user_scan/${user}`,config)
            setData(data)
        }
       
        getData()
    },[])
    console.log(data)
    const user1=window.localStorage.getItem('user')
    if(!user1){
        window.location.replace('/login')
    }
  return (
    <div className="lg:flex">
        <div className="lg:w-1/2 xl:max-w-screen-sm">
            
            <div className="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl pb-12">
                    <h2 className="text-center font-Avalon text-4xl text-cl font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">welcom back hacker  </h2><br/>
                    <h2 className="text-center font-Avalon text-2xl text-cl font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">total scans : {data.length} </h2>
                    <div className="mt-7 pb-4">

                            {data.map((datum)=>{
                                return (
                                    <div className="flex flex-row bg-mainwhite shadow-sm rounded p-4 mb-5">
                                        <div className="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                                            <BsUpcScan></BsUpcScan>
                                        </div>
                                        <div className="flex flex-col flex-grow ml-4">
                                            <div className="text-sm text-gray-500">participant</div>
                                            <div className="font-bold text-lg">{datum.scnanned}</div>              
                                        </div>
                                    </div>   
                                    
                                         
                                )
                            })}
                        
                    </div>
            </div>
        </div>
        <div className="hidden lg:flex items-center justify-center bg-cl flex-1 h-screen">
            <div className="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
            
            </div>
        </div>
</div>
  )
}

export default ScanH