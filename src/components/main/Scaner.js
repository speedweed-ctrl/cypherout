
import React , {useState} from 'react'
import { QrReader } from 'react-qr-reader';
import ReslutModal from './ReslutModal';
import './a.css'
const Scaner = () => {
    const [data, setData] = useState('No result');
    const [Modal,setModal]=useState(false)
    const res=data.split('.')
    
    const user=window.localStorage.getItem('user')
    

    return (
      <>
      
      <div class="grid place-items-center ">
        
      <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mb-10  shadow-md" role="alert" >
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      <p class="font-bold">scann a participant</p>
      <p class="text-sm">Align the qr code in the marked area and Make sure that ur hand are steady.</p>
    </div>
  </div>
</div>


        <div id="content">
      <QrReader
        className=' w-screen h-3/6 '
          onResult={(result, error) => {
            if (!!result) {
              setData(result.text);
              setModal(true)
              
            }
  
            if (!!error) {
              console.info(error);
            }
          }}
          constraints={{ facingMode: 'environment' }}
          
        />
        </div>
</div>
        
        {
            Modal?<ReslutModal props={res} />:<></>
        }
      </>
    );
}

export default Scaner
