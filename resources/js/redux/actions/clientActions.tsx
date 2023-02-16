
import {ApiError, Client} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";
import ClientService from "../services/clientService";

import clientSlice from "../slices/clientSlice";

export const clientActions = clientSlice.actions

export const addClient = (client:Client):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:Client|ApiError = await ClientService.add(client)

        if(!isApiError(response,201)) {
            toast.success('Client added.')
            dispatch(clientActions.setClient(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const viewClient = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Client|ApiError = await ClientService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('client loaded')
        dispatch(clientActions.setClient(response))
    }
}

export const updateClient = (client:Client):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Client|ApiError = await ClientService.update(client)
        if(!isApiError(response,200)) {
            toast.success('Updated client')
            dispatch(clientActions.setClient(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteClient = (client:Client):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await ClientService.delete(client)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllClients = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Client[]|ApiError = await ClientService.getAll()

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded clients')
        dispatch(clientActions.setClients(response))
    }
}
