
import React, {useEffect, useState} from "react";
import IconButton from "@mui/material/IconButton";
import {ArrowCircleLeft, ArrowCircleRight} from "@mui/icons-material";

export const CarouselItem = ({children, width}) => {
    return (
        <div className="carousel-item" style={{width:width}}>
            {children}
        </div>
    )
}

const Carousel = ({children}) => {
    const [activeIndex,setActiveIndex] = useState(0)

    useEffect(()=>{
        const interval = setInterval(()=>{
            updateIndex(activeIndex+1)
        },4000)

        return () => {
            if(interval){
                clearInterval(interval)
            }
        }
    })

    const updateIndex = (newIndex) => {
        if(newIndex<0){
            newIndex = React.Children.count(children) - 1
        } else if (newIndex > React.Children.count(children)) {
            newIndex = 0
        }

        setActiveIndex(newIndex)
    }

    return (
        <div className="carousel">
            <div className="inner" style={{transform: `translateX(-${activeIndex * 100}%)`}}>
                {
                    React.Children.map(children,(child, index) => {
                        return React.cloneElement(child,{width:"100%"})
                    })
                }
            </div>
            <div className="indicators">
                <IconButton onClick={() => {updateIndex(activeIndex -1 )}}><ArrowCircleLeft/></IconButton>
                <IconButton onClick={() => {updateIndex(activeIndex + 1)}}><ArrowCircleRight/></IconButton>
            </div>
        </div>
    )
}

export default Carousel
