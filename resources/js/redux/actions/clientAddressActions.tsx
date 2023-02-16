
import {ApiError, ClientAddress} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";
import ClientAddressService from "../services/clientAddressService";

import clientAddressSlice from "../slices/clientAddressSlice";

export const clientAddressActions = clientAddressSlice.actions

export const addClientAddress = (clientAddress:ClientAddress):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:ClientAddress|ApiError = await ClientAddressService.add(clientAddress)

        if(!isApiError(response,201)) {
            toast.success('Client Address added.')
            dispatch(clientAddressActions.setClientAddress(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const viewClientAddress = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ClientAddress|ApiError = await ClientAddressService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('client address loaded')
        dispatch(clientAddressActions.setClientAddress(response))
    }
}

export const updateClientAddress = (clientAddress:ClientAddress):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ClientAddress|ApiError = await ClientAddressService.update(clientAddress)
        if(!isApiError(response,200)) {
            toast.success('Updated client address')
            dispatch(clientAddressActions.setClientAddress(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteClientAddress = (clientAddress:ClientAddress):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await ClientAddressService.delete(clientAddress)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllClientAddresses = (clientId:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ClientAddress[]|ApiError = await ClientAddressService.getAll(clientId)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded client addresses')
        dispatch(clientAddressActions.setClientsAddresses(response))
    }
}
