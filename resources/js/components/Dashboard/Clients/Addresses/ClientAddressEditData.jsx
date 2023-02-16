
import React, {useEffect} from "react"
import {useParams} from "react-router-dom";
import {useAppDispatch, useAppSelector} from "../../../../redux/hooks/hooks";
import {viewClientAddress} from "../../../../redux/actions/clientAddressActions";

const ClientAddressEditData = () => {
    const dispatch = useAppDispatch()
    const params = useParams();
    const clientAddress = useAppSelector(state => state.clientAddress.clientAddress);

    console.log(clientAddress);

    useEffect(()=>dispatch(viewClientAddress(params.id)),[])

    return (
        <></>
    )
}

export default ClientAddressEditData;
