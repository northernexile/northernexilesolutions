
import React from "react";
import Role from "./Role";

const CV = ({cv}) => {


    const roles = () => {
        return cv.map((cv,index)=>(
            <Role item={cv} />
        ))
    }

    return (
        <>
            {cv.length > 0 && roles()}
        </>
    )
}

export default CV
