
import {ApiError, ClientInvoiceItem} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";
import ClientInvoiceItemService from "../services/clientInvoiceItemService";

import clientInvoiceItemSlice from "../slices/clientInvoiceItemSlice";

export const clientInvoiceItemActions = clientInvoiceItemSlice.actions

export const addClientInvoiceItem = (clientInvoiceItem:ClientInvoiceItem):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:ClientInvoiceItem|ApiError = await ClientInvoiceItemService.add(clientInvoiceItem)

        if(!isApiError(response,201)) {
            toast.success('Client invoice item added.')
            dispatch(clientInvoiceItemActions.setClientInvoiceItem(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const viewClientInvoiceItem = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ClientInvoiceItem|ApiError = await ClientInvoiceItemService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('client invoice item loaded')
        dispatch(clientInvoiceItemActions.setClientInvoiceItem(response))
    }
}

export const updateClientInvoiceItem = (clientInvoiceItem:ClientInvoiceItem):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ClientInvoiceItem|ApiError = await ClientInvoiceItemService.update(clientInvoiceItem)
        if(!isApiError(response,200)) {
            toast.success('Updated client invoice item')
            dispatch(clientInvoiceItemActions.setClientInvoiceItem(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteClientInvoiceItem = (clientInvoiceItem:ClientInvoiceItem):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await ClientInvoiceItemService.delete(clientInvoiceItem)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllClientInvoiceItems = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ClientInvoiceItem[]|ApiError = await ClientInvoiceItemService.getAll()

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded client invoices')
        dispatch(clientInvoiceItemActions.setClientsInvoiceItems(response))
    }
}
