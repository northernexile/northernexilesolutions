
import {ApiError, ExperienceSector, ExperienceTechnology} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import ExperienceSectorService from "../services/experienceSectorService";
import ExperienceSectorSlice from "../slices/experienceSectors";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";
import ExperienceTechnologyService from "../services/experienceTechnologyService";
import {experienceTechnologyActions} from "./experienceTechnologyActions";

export const experienceSectorActions = ExperienceSectorSlice.actions

export const addExperienceSector = (experienceSector:ExperienceSector):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:ExperienceSector|ApiError = await ExperienceSectorService.add(experienceSector)

        if(!isApiError(response,201)) {
            toast.success('Experience Sector added.')
            dispatch(experienceSectorActions.setSector(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const toggleExperienceSector = (experienceId:any,sectorId:any):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:ExperienceSector|ApiError = await ExperienceSectorService.toggle(experienceId,sectorId)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Experience sector loaded')
        dispatch(experienceSectorActions.setSector(response))
    }
}

export const viewExperienceSector = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ExperienceSector|ApiError = await ExperienceSectorService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Experience Sector loaded')
        dispatch(experienceSectorActions.setSector(response))
    }
}

export const updateExperienceSector = (experienceSector:ExperienceSector):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ExperienceSector|ApiError = await ExperienceSectorService.update(experienceSector)
        if(!isApiError(response,200)) {
            toast.success('Updated Experience Sector')
            dispatch(experienceSectorActions.setSector(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteExperienceSector = (experienceSector:ExperienceSector):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await ExperienceSectorService.delete(experienceSector)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllExperienceSectors = (experience:ExperienceSector):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ExperienceSector[]|ApiError = await ExperienceSectorService.getAll(experience)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded Experience Sector')
        dispatch(experienceSectorActions.setSectors(response))
    }
}
