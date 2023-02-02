
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
        const response:Sector[] = await SectorService.getAllSectors()
        dispatch(SectorActions.setSectors(response))

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
