
import sectorSlice from "../slices/sectorSlice";
import {AnyAction} from "redux";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {ApiError, Sector} from "../types/types"
import SectorService from "../services/sectorService";
import TagService from "../services/tagService";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";

export const SectorActions = sectorSlice.actions

export const getAllSectors = ():ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        const response:Sector[]|ApiError = await SectorService.getAllSectors()

        if(isApiError(response,200)){
            toast.error(response.message);
            return
        }

        toast.success('Sectors loaded')
        dispatch(SectorActions.setSectors(response))

    }
}

export const addSector = (sector:Sector):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        const response:Sector|ApiError = await SectorService.add(sector.name)

        if(isApiError(response,201)){
            toast.error(response.message)
            return
        }

        SectorActions.setActiveSector(response)
        toast.error('Sector added')
    }
}

export const deleteSector = (sector:Sector):ThunkAction<void,RootState,unknown,AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await SectorService.delete(sector)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}
