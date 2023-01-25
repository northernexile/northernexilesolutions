
import React, {useEffect,useState} from "react";
import {useAppSelector,useAppDispatch} from "../redux/hooks/hooks";
import {Alert, AlertTitle} from "@mui/material";
import {clearError} from "../redux/actions/errorActions";

export default function ApiErrorDisplay() {

    const timeoutDuration = 10000

    let error = useAppSelector(state => state.error.error)
    const dispatch = useAppDispatch();
    const [alert,setAlert] = useState(true);

    const renderError = () => {
        return (error.success === false)
            ? <Alert onClose={() => clearApiError()} severity={`error`}>
                <AlertTitle>Error {error.message} <small>{error.code}</small></AlertTitle>
                {error.data.message}
        </Alert>
            : ''
    }

    useEffect(()=>{
        setTimeout(() => {
            clearApiError()
        }, timeoutDuration);
    },[])

    const clearApiError = () => {
        setAlert(false)
        dispatch(clearError())
    }

    return (
        <>
            {alert && renderError()}
        </>
    )
}
