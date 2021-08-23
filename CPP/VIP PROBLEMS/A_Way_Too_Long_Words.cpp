#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    string str;
    for(int i = 0; i < n; i++){
        cin >> str;
        if(str.length()>10){
            int temp = str.length() - 2;
            cout << str[0] << temp << str[str.length()-1] << endl;
        }else cout << str << endl;
    }
    
}