
import sectorSlice from "../slices/sectorSlice";
import {AnyAction} from "redux";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {Sector} from "../types/types"
import SectorService from "../services/sectorService";

export const SectorActions = sectorSlice.actions

export const getAllSectors = ():ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        if(getState().sectors.sectors.length == 0){
            const response:Sector[] = await SectorService.getAll()
            dispatch(SectorActions.setSector(response))
        }
    }
}
