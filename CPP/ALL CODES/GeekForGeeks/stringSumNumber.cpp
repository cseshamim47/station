#include <bits/stdc++.h>
using namespace std;

int main()
{
    string s = "1kjh12jlk7adf";
    s = s + " ";
    char convert[s.length()+1];
    strcpy(convert,s.c_str());
    int sum = 0;
    string ans = "";
    for(int i = 0; i < s.length(); i++){
       if(isdigit(s[i])){
         ans += convert[i];
       }else if(ans.length() > 0){
         sum += stoi(ans);
         ans = "";
       }
    }
    cout << sum << endl;
    
}