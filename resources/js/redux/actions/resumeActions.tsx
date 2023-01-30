
import {ApiError, Experience} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import ExperienceService from "../services/experienceService";
import experienceSlice from "../slices/experienceSlice";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";

export const experienceActions = experienceSlice.actions

export const addExperience = (experience:Experience):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:Contact|ApiError = await ContactService.add(experience)

        if(!isApiError(response,201)) {
            toast.success('Experience added.')
            dispatch(experienceActions.setExperience(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const viewExperience = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Experience|ApiError = await ExperienceService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Experience loaded')
        dispatch(contactActions.setExperience(response))
    }
}

export const updateExperience = (experience:Experience):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Experience|ApiError = await ExperienceService.update(experience)
        if(!isApiError(response,200)) {
            toast.success('Updated experience')
            dispatch(contactActions.setExperience(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteExperience = (experience:Experience):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await ExperienceService.delete(contact)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllExperience = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Experience[]|ApiError = await ExperienceService.getAll()

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded experience')
        dispatch(experienceActions.setExperience(response))
    }
}
