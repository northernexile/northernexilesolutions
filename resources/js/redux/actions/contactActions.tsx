
import {Contact} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import ContactService from "../services/contactService";
import contactSlice from "../slices/contactSlice";

export const contactActions = contactSlice.actions

export const addContact = (contact:Contact):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:Contact = await ContactService.add(contact.name,contact.email,contact.text)
        dispatch(contactActions.setContact(response))
    }
}

export const viewContact = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Contact = await ContactService.getById(id)
        dispatch(contactActions.setContact(response))
    }
}

export const updateContact = (contact:Contact):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Contact = await ContactService.update(contact.id,contact.name,contact.email,contact.text)
        dispatch(contactActions.setContact)
    }
}

export const deleteContact = (contact:Contact):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean = await ContactService.delete(contact)
    }
}

export const getAllContacts = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Contact[] = await ContactService.getAll()
        dispatch(contactActions.setContacts(response))
    }
}
