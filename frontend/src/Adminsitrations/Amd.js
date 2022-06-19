import React from 'react'
import Adcard from './Adcard'

const data=[
    {
        location:'poste la gazele',
        Services:'Ad nostrud veniam est dolore reprehenderit ad ullamco excepteur est fugiat aute eu cupidatat.'
    },
    {
        location:'poste raouad',
        Services:'Ad nostrud veniam est dolore reprehenderit ad ullamco excepteur est fugiat aute eu cupidatat.'
    },
    {
        location:'poste la ariana',
        Services:'Ad nostrud veniam est dolore reprehenderit ad ullamco excepteur est fugiat aute eu cupidatat.'
    },
    {
        location:'poste la menzah',
        Services:'Ad nostrud veniam est dolore reprehenderit ad ullamco excepteur est fugiat aute eu cupidatat.'
    }
]

const Amd = () => {
  return (
    <>
        {
            data.map((datum)=>{
                return(
                    <>
                        <Adcard props={datum}/>
                    </>

                )
            })
        }
    </>
  )
}

export default Amd