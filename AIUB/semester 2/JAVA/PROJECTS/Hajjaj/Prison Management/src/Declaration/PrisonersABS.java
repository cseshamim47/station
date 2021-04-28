package Declaration;

public abstract class PrisonersABS { // class = must be inherited by a regular class

    protected int cellId;
    protected String name;
    protected String age;
    protected String height;
    protected String eyeColor;
    protected double punishmentDuration;
    protected int attendance;

    public abstract void setCellId(int id);
    public abstract void setName(String name);
    public abstract void setAge(String age);
    public abstract void setHeight(String height);
    public abstract void setEyeColor(String eyeColor);
    public abstract void setPunishmentDuration(double punishmentDuration);
    public abstract void setAttendance(int attendance);

    public abstract int getCellId();
    public abstract String getName();
    public abstract String getAge();
    public abstract String getHeight();
    public abstract String getEyeColor();
    public abstract double getPunishmentDuration();
    public abstract int getAttendance();
}
