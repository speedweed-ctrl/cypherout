import React, { useState } from 'react'
import axios from 'axios'

const ReslutModal = ({props}) => {
  const token=window.localStorage.getItem('token')
    const [active,setActive]=useState(true)

    const config = {
        headers: { Authorization: `Bearer ${token}`}
    };

  const updateDB=async(e)=>{
    e.preventDefault()
    const {data}=await axios.post('http://192.168.1.11:8000/api/add_scann',{
      part:props[0]+props[1],
      cin: parseInt(props[2]) ,
      uid:props[3]
    },config
    )
  }
  
  
    if(active){
      return (
          
        <div class="modal fade fixed top-5 left-0  w-full h-full outline-none  overflow-y-auto"  >
      <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none ">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-mainwhite rounded-md outline-none text-current">
          <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
            <center></center>
            <h5 class="text-1xl font-Avalon text-transparent text-black  " >
            intelligent beign detected
            </h5>
            <button type="button"
              class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
              data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body relative p-4">
            <p className='text-1xl font-Avalon block mt-4 lg:inline-block lg:mt-0 text-black' >name: {props[0]}</p>
            <p className='text-1xl font-Avalon block mt-4 lg:inline-block lg:mt-0 text-black' >lastname: {props[1]}</p>
            <p className='text-1xl font-Avalon block mt-4 lg:inline-block lg:mt-0 text-black' >id: {props[3]}</p>
          </div>
          <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
            <button type="button"
              class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
              onClick={(e)=>e.preventDefault(setActive(false),window.location.reload())}
              >
              cancel
            </button>
            <button type="button"
            onClick={(e)=>updateDB(e)}
              class="inline-block px-6 py-2.5 bg-cl text-white font-Avalon text-xs leading-tight uppercase rounded shadow-md hover:bg-cl hover:shadow-lg focus:bg-cl focus:shadow-lg focus:outline-none focus:ring-0 active:bg-cl active:shadow-lg transition duration-150 ease-in-out ml-1">
              confirm 
            </button>
          </div>
        </div>
      </div>
    </div>
      )
    }else{
      return(
        <></>
      )
    }
  
  
}

export default ReslutModal