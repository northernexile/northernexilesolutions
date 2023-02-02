import React from "react";
import {Controller} from "react-hook-form";
import {MenuItem, Select,} from "@mui/material";

export const FormRowDropdown = ({name, label,control,options,placeholder}) => {

    const generateSingleOptions = () => {
        return options.map((option) => {
            return (
                <MenuItem key={option.id} value={option.id}>
                    {option.name}
                </MenuItem>
            );
        });
    };

    return (
        <div className={`form-row`}>
            <Controller
                control={control}
                name={name}
                render={({
                             field: { onChange, onBlur, value, name, ref }
                             ,formState,
                         }) => (
                    <Select
                        label={label}
                        onChange={onChange}
                        value={value}
                        fullWidth
                        className={`form-input form-input-text unlocked`}
                    >
                        <MenuItem selected={true} disabled value="">
                            <em>{placeholder}</em>
                        </MenuItem>
                        {generateSingleOptions()}
                    </Select>
                )}
            />
        </div>
    );
};

export default FormRowDropdown
