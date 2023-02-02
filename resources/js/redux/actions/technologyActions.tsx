
import technologySlice from '../slices/technologySlice'
import {AnyAction} from "redux";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {ApiError, Sector, Technology} from "../types/types";
import TechnologyService from '../services/technologyService';
import SectorService from "../services/sectorService";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";
import {SectorActions} from "./sectorActions";

export const technologyActions = technologySlice.actions

export const getAllTechnologies =():ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState): Promise<void> =>{
        const response:Technology[] = await TechnologyService.getAllTechnologies()
        dispatch(technologyActions.setTechnologies(response))
    }
}


export const addTechnology = (technology:Technology):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        const response:Technology|ApiError = await TechnologyService.add(technology.name)

        if(isApiError(response,201)){
            toast.error(response.message)
            return
        }

        SectorActions.setActiveSector(response)
        toast.error('Technology added')
    }
}

export const deleteTechnology = (technology:Technology):ThunkAction<void,RootState,unknown,AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await TechnologyService.delete(technology)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

