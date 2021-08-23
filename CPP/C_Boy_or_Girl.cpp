#include <iostream>
#include <algorithm>
using namespace std;
int main(){
    string x;
    cin >> x;
    sort(x.begin(),x.end());
    int count = 0;
    for(int i = 0; i<x.length(); i++){
        if(x[i]!=x[i+1]){
            count++;
        }
    }
    if(count%2==0){
            cout << "CHAT WITH HER!" << endl;
    }else   cout << "IGNORE HIM!" << endl;
    
}


