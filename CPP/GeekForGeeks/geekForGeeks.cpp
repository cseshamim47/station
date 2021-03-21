#include <iostream>
using namespace std;
// static int x = 0;
class prisoner{
    private:
        string id;
        string name;
        string age;
        string height;
        string eyeColor;
        int punishmentDuration;
        int attendance;
    public:
        prisoner(){}
        void setName(string name){this->name = name;}
        string getName(){return name;}

        void setId(string id){this->id = id;}
        string getId(){return id;}

        void setAge(string age){this->age = age;}
        string getAge(){return age;}

        void setHeight(string height){this->height = height;}
        string getHeight(){return height;}

        void setEyeColor(string eyeColor){this->eyeColor = eyeColor;}
        string getEyeColor(){return eyeColor;}

        void setPunishmentDuration(int punishmentDuration){this->punishmentDuration = punishmentDuration;}
        int getPunishmentDuration(){return punishmentDuration;}

        void setAtt(int attendance){
            this->attendance;

            cout << "Do you wish to change punish";    
        }
        int getAtt(){return attendance;}
        //........setGet end.............//
        void prisonerDetails(){
            cout << "Id : " << id << endl;
            cout << "Name : " << name << endl;
            cout << "Age : " << age << endl;
            cout << "Height : " << height << endl;
            cout << "Eyecolor : " << eyeColor << endl;
            cout << "Punishment Duration : " << punishmentDuration  << " years"<< endl;
        }

};

int main()
{
    // prisoner obj;
    // obj.setName("Md shamim ahemd");
    // obj.setAge("21 yr");
    // obj.setHeight("5'7\"");
    // obj.setEyeColor("Brown");
    // obj.setPunishmentDuration(10);

    // obj.prisonerDetails();
    int n;
    cout << "Enter number of prisoners you want to take in : ";
    cin >> n;
    prisoner obj[n];
    for(int i = 0;i<n;i++){
        string name, age, height, eyeColor,id;
        int punishmentDuration;
        cin.ignore();
        cout << "Enter id : ";
        getline(cin,id);
        cout << "Enter Name : ";
        getline(cin,name);
        cout << "Enter Age : ";
        getline(cin,age);
        cout << "Enter height : ";
        getline(cin,height);
        cout << "Eye color : ";
        getline(cin,eyeColor);
        cout << "Enter punishment duration : ";
        cin >> punishmentDuration;
        obj[i].setId(id);
        obj[i].setName(name);
        obj[i].setAge(age);
        obj[i].setHeight(height);
        obj[i].setPunishmentDuration(punishmentDuration);
    }

    string a;
    cin.ignore();
    getline(cin,a);
    int count = 0;
    for(auto x : obj){
        if(x.getId()==a) {
            x.prisonerDetails();
            count++;
            break;
        }
    } 
    if(count<0) cout << "Invalid Id" << endl;

        
        
}


