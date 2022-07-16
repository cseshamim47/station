package Buy_A_Ticket;

public interface IVehicle /// Interface + Abstraction + Polymorphism
{
    ///////******************************** SETTER METHODS *****************************************\\
    public abstract void setVehicleName(String vehicleName) ;

    public abstract void setVehicleType(String vehicleType) ;

    public abstract void setVehicleNo(String vehicleNo) ;

    ///////******************************** GETTER METHODS *****************************************\\
    public abstract String getVehicleName();

    public abstract String getVehicleType() ;

    public abstract String geVehicleNo() ;
}
