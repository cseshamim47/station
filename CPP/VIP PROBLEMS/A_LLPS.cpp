#include <iostream>
#include <string>
using namespace std;

int main()
{
    string s;
    cin >> s;
    char largest = 'A';
    char ans[10]={};
    for(int i = 0; i<s.length(); i++){
        if(largest<s[i]){
            largest = s[i];
        }
    }
    //ans[0] = largest;
    int k = 0;
    for(int i=0; i<s.length(); i++){
        if(s[i]==largest){
            ans[k]=s[i];
            k++;
        }
    }
    for(int i = 0; i < k; i++){
        cout << ans[i];
    }
}