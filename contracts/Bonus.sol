pragma solidity ^0.8.0;

contract BonusContract {
    uint256 private Eff;
    uint256 private bonus;
    uint256 private id;
    function setBonus (uint256 newBonus) public{
        bonus=newBonus;
    }
    function setid (uint256 newid) public{
        id=newid;
    }
    function setEff (uint256 newEff) public{
        Eff=newEff;
    }
    function getEff () public view returns (uint256){
        return Eff;
    }
    function getBonus() public view returns (uint256){
        return bonus;
    }
    function getId() public view returns (uint256){
        return id;
    }
}