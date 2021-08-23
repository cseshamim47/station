#include <bits/stdc++.h>
using namespace std;

int main()
{
    string keyboard = "qwertyuiopasdfghjkl;zxcvbnm,./";
    char ch;
    string str;
    cin >> ch >> str;

    
        for(int i = 0; i < str.length(); i++){
            int index = keyboard.find(str[i]);
            if(ch == 'R')
                cout << keyboard[index-1];
            else 
                cout << keyboard[index+1];
            // int x = ;
        }
    

    
}