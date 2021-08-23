#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    string str;
    cin >> str;

    transform(str.begin(),str.end(),str.begin(),::tolower);
    sort(str.begin(),str.end());
    
    queue<char>ch;

    for(int i = 0; i < str.size(); i++){
        if(str[i] != str[i+1]){
            // cout << i << " " << i+1 << endl;
            ch.push(str[i]); 
        } 
    }
    // cout << ch.size() << endl;
    if(ch.size() == 26) cout << "YES" << "\n";
    else cout << "NO" << "\n";

}