ReplaceSpaceWithEmpty = function(originalValue){
    fixedValue = originalValue.toString().replace(/[ ]/g, '');
    
    return fixedValue;
}