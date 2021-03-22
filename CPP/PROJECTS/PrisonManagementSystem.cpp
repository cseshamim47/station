#include <iostream>
using namespace std;
int _index = 0;
int cell = 1;
int attemp = 0;
class prisoner
{
private:
    int id;
    string name;
    string age;
    string height;
    string eyeColor;
    double punishmentDuration;
    int attendance;

public:
    prisoner() {}

    void test(){
        _index++;
        cell++;
    }

    void setName(string name) { this->name = name; }
    string getName() { return name; }

    void setId(int id) { this->id = id; }
    int getId() { return id; }

    void setAge(string age) { this->age = age; }
    string getAge() { return age; }

    void setHeight(string height) { this->height = height; }
    string getHeight() { return height; }

    void setEyeColor(string eyeColor) { this->eyeColor = eyeColor; }
    string getEyeColor() { return eyeColor; }

    void setPunishmentDuration(double punishmentDuration) { this->punishmentDuration = punishmentDuration; }
    double getPunishmentDuration() { return punishmentDuration; }

    void setAtt(int attendance)
    {
        this->attendance = attendance;
    }
    int getAtt() { return attendance; }
};

prisoner info[100000];

class database : public prisoner
{
public:
    
    void createPrisoner()
    {
        cout << "Prisoner cell number : " << cell << endl;
        cout << "Enter name : ";
        string name;
        cin >> ws;
        getline(cin, name);

        cout << "Age : ";
        string age;
        cin >> ws;
        getline(cin, age);

        cout << "Height : ";
        string height;
        cin >> ws;
        getline(cin, height);

        cout << "Eye Color : ";
        string eyeColor;
        cin >> ws;
        getline(cin, eyeColor);

        cout << "Punishment Duration in years(must be numeric value > 0) : ";
        double punishmentDuration;
        cin >> punishmentDuration;

        cout << "Set Attendance in days (must be numeric value > 0) : ";
        int attendance;
        cin >> attendance;

        info[_index].setId(cell);
        info[_index].setName(name);
        info[_index].setAge(age);
        info[_index].setHeight(height);
        info[_index].setEyeColor(eyeColor);
        info[_index].setPunishmentDuration(punishmentDuration);
        info[_index].setAtt(attendance);

        _index++;
        cell++;
    }
    void prisonerDetails()
    {
        cout << endl;
        cout << "Cell-No\t   Name\t\t\tAge\t   Height\tEyecolor      Punishment Duration    Attendance\n";
        cout << endl;
        for (int i = 0; i < _index; i++)
        {
            cout << info[i].getId() << "\t   " << info[i].getName() << "      "
                 << info[i].getAge() << "\t   " << info[i].getHeight() << "\t\t"
                 << info[i].getEyeColor() << "\t      " << info[i].getPunishmentDuration()
                 << " Years\t\t     " << info[i].getAtt() << " days" << endl;
        }
        
    }
};

// class end


void optionMessage()
{
    cout << "\nPress 0 : Exit Program" << endl;
    cout << "Press 1 : Build a master table" << endl;
    cout << "Press 2 : List a table" << endl;
    cout << "Press 3 : Insert a new entry" << endl;
    cout << "Press 4 : Delete old entry" << endl;
    cout << "Press 5 : Edit an entry" << endl;
    cout << "Press 6 : Search for record" << endl;
    cout << "Press 7 : Check Attendance" << endl;
    cout << "Press 8 : Release Prisoner" << endl;
    cout << "\nChoose an option: ";
}
void masterTable()
{
    database ob;
    cout << "How many prisoners do you wish to enter : ";
    int numberOfPrisoners;
    cin >> numberOfPrisoners;

    if (numberOfPrisoners > 0)
    {
        for (int i = 0; i < numberOfPrisoners; i++)
            ob.createPrisoner();
            cout << endl;
    }
}
void optionMessageSingle()
{
    for (;;)
    {
        cout << endl;
        cout << "Write 'option' to see all option again( Enter 'skip' to go to exit ) : ";
        string a;
        cin >> a;
        if (a == "option" || a == "Option" || a == "OPTION")
        {
            optionMessage();
            break;
        }
        else if (a == "skip" || a == "SKIP" || a == "Skip")
        {
            cout << "Now enter 0 to exit!!" << endl;
            cout << "-------> ";
            break;
        }
        else
        {
            cout << "Wrong keyword" << endl;
            continue;
        }
    }
}
void showSinglePrisoner(int cell){
    // database ob;
    cell = cell-1;
    cout << endl;
    cout << "Cell-No\t   Name\t\t\tAge\t   Height\tEyecolor      Punishment Duration    Attendance\n";
    if(info[cell].getId() == 0) cout << "\nNo prisoner record found" << endl;
    else{
    cout << endl;
    cout << info[cell].getId() << "\t   " << info[cell].getName() << "      "
            << info[cell].getAge() << "\t   " << info[cell].getHeight() << "\t\t"
            << info[cell].getEyeColor() << "\t      " << info[cell].getPunishmentDuration()
            << " Years\t\t     " << info[cell].getAtt() << " days" << endl;
    }
}
void deletePrisoner(){
    database ob;
    string option;
    int deleteEntry;
    for(;;){
        cout << endl;
        cout << "Press 1 : Delete/Release a prisoner by his cell number" << endl;
        cout << "Press 2 : Check cell id from table list" << endl;
        cout << "Press 3 : Back to main menu" << endl << endl;
        cout << "Choose an option : ";
        cin >> ws;
        getline(cin,option);
        if(option == "1"){
            cout << "Enter prisoner cell number : ";
            cin >> deleteEntry;
            showSinglePrisoner(deleteEntry);
            cout << endl;
            cout << "Do you want to continue? Type 'Y/N' : ";
            string confirmation;
            cin >> ws;
            getline(cin,confirmation);
            if(confirmation == "y" || confirmation ==  "Y"){
                break;
            }else continue;
            
        }else if(option == "2") {
            ob.prisonerDetails();
            continue;
        }else if(option == "3") break;
    }

    if(info[deleteEntry-1].getId()!=0){
    for(int i = deleteEntry-1; i<_index;i++){
        info[i] = info[i+1];
        info[i].setId(i+1);
    }
    _index--;
    cout << endl;
    cout << "Successfully deleted the prisoner from existing entry!!" << endl;
    } 
}
void editPrisonerOptions(){
    cout << endl;
    cout << "Enter 0 : Main Menu" << endl;
    cout << "Enter 1 : Edit Name" << endl;
    cout << "Enter 2 : Edit Age" << endl;
    cout << "Enter 3 : Edit Height" << endl;
    cout << "Enter 4 : Edit Eyecolor" << endl;
    cout << "Enter 5 : Edit Punishment Duration" << endl;
    cout << endl << "Enter Option : ";
}
void editPrisoner(int cell){
    showSinglePrisoner(cell);
    cell -= 1;
    cout << endl;
    cout << "Do you want to modify this prisoner details? (Y/N) : ";
    string confirmation;
    cin >> ws;
    getline(cin,confirmation);
    if(confirmation == "y" || confirmation ==  "Y"){
        editAgain:
        editPrisonerOptions();
        int option;
        cin >> option;
        if(option == 1){
            cout << "Enter new name : ";
            string name;
            cin >> ws;
            getline(cin,name);
            info[cell].setName(name);
        }
        if(option == 2){
            cout << "Enter new age : ";
            string age;
            cin >> ws;
            getline(cin,age);
            info[cell].setAge(age);
        }
        if(option == 3){
            cout << "Enter new height : ";
            string height;
            cin >> ws;
            getline(cin,height);
            info[cell].setHeight(height);
        }
        if(option == 4){
            cout << "Enter new eye color : ";
            string eyeColor;
            cin >> ws;
            getline(cin,eyeColor);
            info[cell].setEyeColor(eyeColor);
        }
        if(option == 5){
            cout << "Enter new punishment duration in years(must be numeric value >= 0) : ";
            double punishmentDuration;
            // cin >> ws;
            cin >> punishmentDuration;
            info[cell].setPunishmentDuration(punishmentDuration);
        }
        if(option){
            cout << "Do you want to edit again? (Y/N) : ";
            cin >> ws;
            getline(cin,confirmation);
            if(confirmation == "y" || confirmation ==  "Y"){
            goto editAgain;
            }
        }
        
        
    }
}
int enterCellNumber(){
    int cell;
    cout << "Enter cell number : ";
    cin >> cell;
    return cell;
}
void checkAttendance(){
    cout << endl;
    cout << "Cell-No\t   Name\t\t\tPunishment Duration     Attendance\n";
    cout << endl;
    for (int i = 0; i < _index; i++)
    {
        cout << info[i].getId() << "\t   " << info[i].getName() << "      "
             << info[i].getPunishmentDuration()
             << " Years\t\t" << info[i].getAtt() << " days" << endl;
    }
    cout << endl;
    cout << "Do you want to decrese punishment Duration? (Y/N) : ";
    string confirmation;
    int cell;
    cin >> ws;
    getline(cin,confirmation);
    if(confirmation == "y" || confirmation == "Y"){
        cout << "Enter cell no : ";
        cin >> cell;
        cout << "Enter how many years do you want to decrease : ";
        int decrease;
        cin >> decrease;
        if(info[cell-1].getPunishmentDuration()-decrease >= 0){
        info[cell-1].setPunishmentDuration(info[cell-1].getPunishmentDuration()-decrease);
        cout << endl << "Operation Successfull!!" << endl;
        }
        else cout  << endl << "Operation Failed!! ( Decrease duration <= Current punishment duration )";
        cout << endl;
        showSinglePrisoner(cell);
    }
}
void releasePrisoner(){
    releaseAgain:
    int count = 0;
    cout << endl;
    cout << "Cell-No\t   Name\t\t\tAge\t   Height\tEyecolor      Punishment Duration    Attendance\n";
    cout << endl;
    
    for(int i = 0; i < _index; i++){
        if(info[i].getPunishmentDuration()==0) {
            cout << info[i].getId() << "\t   " << info[i].getName() << "      "
                 << info[i].getAge() << "\t   " << info[i].getHeight() << "\t\t"
                 << info[i].getEyeColor() << "\t      " << info[i].getPunishmentDuration()
                 << " Years\t\t     " << info[i].getAtt() << " days" << endl;
            count++;
        }
    } 
    cout  << endl << "Found " << count << " prisoner to release" << endl;

    cout << "Enter cell id to remove : ";
    int cell;
    cin >> cell;
    if(info[cell-1].getId()!=0){
    for(int i = cell-1; i<_index;i++){
        info[i] = info[i+1];
        info[i].setId(i+1);
    }
    _index--;
    cout << endl;
    cout << "Successfully released the prisoner from existing entry!!" << endl;
    count--;
    }
    cout << endl << "You have " << count << " prisoner to release" << endl;
    if(count){
    cout << endl << "Do you want to continue? (Y/N) : ";
    string confirmation;
    cin >> ws;
    getline(cin,confirmation);
    if(confirmation == "y" || confirmation == "Y") goto releaseAgain;
    }
}
void optionMessageAction()
{
    int option;
    database ob;
    cin >> ws;
    for (;;)
    {
        cin >> option;
        cout << endl;
        if (option == 1)
        {
            masterTable();
            optionMessageSingle();
        }
        if (option == 2)
        {
            ob.prisonerDetails();
            optionMessageSingle();
        }
        if (option == 3)
        {
            masterTable();
            optionMessageSingle();
        }
        if (option == 4)
        {
            deletePrisoner();
            optionMessageSingle();
        }
        if (option == 5)
        {
            editPrisoner(enterCellNumber());
            optionMessageSingle();
        }
        if (option == 6)
        {
            showSinglePrisoner(enterCellNumber());
            optionMessageSingle();
        }
        if (option == 7)
        {
            checkAttendance();
            optionMessageSingle();
        }
        if (option == 8)
        {
            releasePrisoner();
            optionMessageSingle();
        }
        if (option == 0)
        {
            break;
        }
        if ((option < 1 || option > 7) && option)
            continue;
    }
}
void prisonerFunction()
{
    optionMessage();
    optionMessageAction();
}
void setDefaultPrisoners();

//////// MAIN START /////////

int main()
{
    setDefaultPrisoners();
    prisonerFunction();
}

//////// MAIN END /////////

void setDefaultPrisoners(){
    info[0].test();
    info[0].setId(1);
    info[0].setName("Md shamim ahmed");
    info[0].setAge("21");
    info[0].setHeight("5'7\"");
    info[0].setEyeColor("Brown");
    info[0].setPunishmentDuration(10);
    info[0].setAtt(19);

    info[1].test();
    info[1].setId(2);
    info[1].setName("Shanto md ahmed");
    info[1].setAge("21");
    info[1].setHeight("5'7\"");
    info[1].setEyeColor("Brown");
    info[1].setPunishmentDuration(10);
    info[1].setAtt(25);


    info[2].test();
    info[2].setId(3);
    info[2].setName("Kuddus Ali Khan");
    info[2].setAge("21");
    info[2].setHeight("5'7\"");
    info[2].setEyeColor("Red");
    info[2].setPunishmentDuration(0);
    info[2].setAtt(30);

}


