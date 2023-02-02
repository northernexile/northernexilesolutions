
import {ApiError, ExperienceTag} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import ExperienceTagService from "../services/experienceTagService";
import experienceTagSlice from "../slices/experienceTagSlice";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";

export const experienceTagActions = experienceTagSlice.actions

export const addExperienceTag = (experienceTag:ExperienceTag):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:ExperienceTag|ApiError = await ExperienceTagService.add(experienceTag)

        if(!isApiError(response,201)) {
            toast.success('Experience Tag added.')
            dispatch(experienceTagActions.setTag(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const viewExperienceTag = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ExperienceTag|ApiError = await ExperienceTagService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Experience Tag loaded')
        dispatch(experienceTagActions.setTag(response))
    }
}

export const updateExperienceTag = (experienceTag:ExperienceTag):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ExperienceTag|ApiError = await ExperienceTagService.update(experienceTag)
        if(!isApiError(response,200)) {
            toast.success('Updated Experience Tag')
            dispatch(experienceTagActions.setTag(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteExperienceTag = (experienceTag:ExperienceTag):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await ExperienceTagService.delete(experienceTag)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllExperienceTags = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ExperienceTag[]|ApiError = await ExperienceTagService.getAll()

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded Experience Tag')
        dispatch(experienceTagActions.setTags(response))
    }
}
