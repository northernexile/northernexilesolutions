
import {ApiError, Contact} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import ContactService from "../services/contactService";
import contactSlice from "../slices/contactSlice";
import errorSlice from "../slices/errorSlice";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";

export const contactActions = contactSlice.actions
export const errorActions = errorSlice.actions


export const addContact = (contact:Contact):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:Contact|ApiError = await ContactService.add(contact.name,contact.email,contact.text)

        if(!isApiError(response,201)) {
            toast.success('Message sent successfully.')
            dispatch(contactActions.setContact(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const viewContact = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Contact|ApiError = await ContactService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Contact loaded')
        dispatch(contactActions.setContact(response))
    }
}

export const updateContact = (contact:Contact):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Contact|ApiError = await ContactService.update(contact.id,contact.name,contact.email,contact.text)
        if(!isApiError(response,200)) {
            toast.success('Updated contact')
            dispatch(contactActions.setContact(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteContact = (contact:Contact):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await ContactService.delete(contact)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllContacts = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Contact[]|ApiError = await ContactService.getAll()

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded contacts')
        dispatch(contactActions.setContacts(response))
    }
}
