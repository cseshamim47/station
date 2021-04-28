package Declaration;

public class Prisoners extends PrisonersABS{

    public void setCellId(int cellId){ this.cellId = cellId; } // dynamic polymorphism
    public void setName(String name){ this.name = name; }
    public void setAge(String age) { this.age = age; }
    public void setHeight(String height){ this.height = height; }
    public void setEyeColor(String eyeColor){ this.eyeColor = eyeColor; }
    public void setPunishmentDuration(double punishmentDuration){ this.punishmentDuration = punishmentDuration; }
    public void setAttendance(int attendance){ this.attendance = attendance; }

    public int getCellId(){ return cellId; }
    public String getName(){ return name; }
    public String getAge() { return age; }
    public String getHeight(){ return height; }
    public String getEyeColor(){ return eyeColor; }
    public double getPunishmentDuration() { return punishmentDuration; }
    public int getAttendance() { return attendance; }

}
