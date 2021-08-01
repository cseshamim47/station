//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define MAX 10000005
void getName(int idx);
int track[100]={0};
struct student
{
    string name;
    int id;
    int batch;
    double cgpa;
    vector<pair<int,int>> friendsId;
    int numberOfFriends(){ return friendsId.size(); }
    void printInfo(){
        cout << "--------------" << endl;
        cout << "Name : " << name << endl;
        cout << "Id : " << id << endl;
        cout << "Batch : " << batch << endl;
        cout << "CGPA : " << cgpa << endl;
        for(int i = 0; i < numberOfFriends(); i++){
            if(i == 0) cout << "## All Friends ID ##" << endl;
            cout << friendsId[i].second;
            if(i != friendsId.size() - 1)
                cout << ", ";
        }
        cout << endl;
    }
    void printNetwork(){
        cout << name;
        for(int i = 0; i < numberOfFriends(); i++){
			if(track[friendsId[i].first] == 1) continue;
			track[friendsId[i].first] = 1;
			cout << ", ";
            getName(friendsId[i].first);
        }
    }
};


int option;
bool comp(student one, student two){

    if(option == 1){
        return one.id < two.id;
    }else if(option == 2){
        if(one.cgpa < two.cgpa) return true;
        else if(one.cgpa == two.cgpa){
            return one.id<two.id;
        }
        return false;
    }else{
        return one.numberOfFriends() < two.numberOfFriends();
    }
    return false;
}

vector<student> students;

void getName(int idx){
    students[idx].printNetwork();
}

void checkFriends(int id1, int id2){
    int cnt = 0;
    for(int i = 0; i < students.size(); i++){
        if(students[i].id == id1){
            for(int j = 0; j<students[i].numberOfFriends(); j++){
                if(students[i].friendsId[j].second == id2){
                    cnt += 1;
                    break;
                }
            }
        }
        if(students[i].id == id2){
            for(int j = 0; j<students[i].numberOfFriends(); j++){
                if(students[i].friendsId[j].second == id1){
                    cnt += 1;
                    break;
                }
            }
        }
    }
    if(cnt == 2) cout << id1 << " and " << id2 << " are connected" << endl;
    else cout << "They are not connected" << endl;
}


int main()
{

    students.push_back({"Sallu Bhai",3,2019,3.11});
    students[0].friendsId.push_back(make_pair(2,1));
    students[0].friendsId.push_back(make_pair(4,3));

    students.push_back({"Md Kuddus Ali",2,2016,3.11});
    students[1].friendsId.push_back(make_pair(0,3));
    students[1].friendsId.push_back(make_pair(2,1));


    students.push_back({"Md Shamim Ahmed",1,2015,3.89});
    students[2].friendsId.push_back(make_pair(1,2));

    students.push_back({"Shakil",4,2015,3.89});
    students[3].friendsId.push_back(make_pair(4,5));

    students.push_back({"Shanto",5,2015,3.89});
    students[4].friendsId.push_back(make_pair(3,4));

    cout << "Friend network : " << endl;
	
	track[0] = 1;
    students[0].printNetwork();
    cout << "\n\n";

    cout << "Friends Connections : " << endl;
    checkFriends(2,1);

    cout << "\n\n";

    cout << "Enter sort option(1,2,3) : ";
    cin >> option;
    sort(students.begin(),students.end(),comp);

    for(int i = 0; i < students.size(); i++){
        students[i].printInfo();
    }

}