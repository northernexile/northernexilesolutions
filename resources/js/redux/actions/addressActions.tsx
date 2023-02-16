
import {ApiError, Address} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";
import AddressService from "../services/addressService";

import addressSlice from "../slices/addressSlice";

export const addressActions = addressSlice.actions

export const addAddress = (address:Address):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:Address|ApiError = await AddressService.add(address)

        if(!isApiError(response,201)) {
            toast.success('Address added.')
            dispatch(addressActions.setAddress(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const viewAddress = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Address|ApiError = await AddressService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('address loaded')
        dispatch(addressActions.setAddress(response))
    }
}

export const updateAddress = (address:Address):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Address|ApiError = await AddressService.update(address)
        if(!isApiError(response,200)) {
            toast.success('Updated address')
            dispatch(addressActions.setAddress(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteAddress = (address:Address):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await AddressService.delete(address)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllAddresses = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Address[]|ApiError = await AddressService.getAll()

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded addresses')
        dispatch(addressActions.setAddresses(response))
    }
}
