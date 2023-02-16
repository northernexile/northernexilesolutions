
import {ApiError, ClientInvoice} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";
import ClientInvoiceService from "../services/clientInvoiceService";

import clientInvoiceSlice from "../slices/clientInvoiceSlice";

export const clientInvoiceActions = clientInvoiceSlice.actions

export const addClientInvoice = (clientInvoice:ClientInvoice):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:ClientInvoice|ApiError = await ClientInvoiceService.add(clientInvoice)

        if(!isApiError(response,201)) {
            toast.success('Client Invoice added.')
            dispatch(clientInvoiceActions.setClientInvoice(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const viewClientInvoice = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ClientInvoice|ApiError = await ClientInvoiceService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('client invoice loaded')
        dispatch(clientInvoiceActions.setClientInvoice(response))
    }
}

export const updateClientInvoice = (clientInvoice:ClientInvoice):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ClientInvoice|ApiError = await ClientInvoiceService.update(clientInvoice)
        if(!isApiError(response,200)) {
            toast.success('Updated client invoice')
            dispatch(clientInvoiceActions.setClientInvoice(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteClientInvoice = (clientInvoice:ClientInvoice):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await ClientInvoiceService.delete(clientInvoice)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllClientInvoices = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ClientInvoice[]|ApiError = await ClientInvoiceService.getAll()

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded client invoices')
        dispatch(clientInvoiceActions.setClientsInvoices(response))
    }
}
