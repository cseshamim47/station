#include <bits/stdc++.h>
using namespace std;

string bigIntegerSubtraction(string s1, string s2);

int main()
{
    int t;
    cin >> t;
    getchar();
    while(t--){
        string s1, s2;
        cin >> s1 >> s2;
        cout << bigIntegerSubtraction(s1,s2) << endl;
    }    
}

string bigIntegerSubtraction(string s1, string s2){
    if(s1.length() > s2.length()) swap(s1,s2);
    else if(s1 > s2) swap(s1,s2);
    int a = s1.size();
    int b = s2.size();
    reverse(s1.begin(),s1.end());
    reverse(s2.begin(),s2.end());
    string str = "";
    int carry = 0;
    for(int i = 0; i < a; i++){
        int sub = (s2[i]-'0')-(s1[i]-'0') - carry;
        if(sub < 0){
            sub += 10;
            carry = 1;
        }else carry = 0;
        str.push_back(sub+'0');
        // cout << str << " " << carry << endl;
    }
    for(int i = a; i < b; i++){
        int sub = (s2[i] - '0') - carry;
        if(sub < 0){
            sub += 10;
            carry = 1;
        }else carry = 0;
        str.push_back(sub+'0');
    }
    reverse(str.begin(),str.end());
    // for(int i = 0; i < str.length(); i++){
    //     if(str[i]=='0') str.erase(i,1);
    // }
    return str;
}

