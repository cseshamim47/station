//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    string str;
    cin >> str;
    int alphabet[26] = {0};
    if(str.size()==1){
        cout << 0 << endl;
        return;
    }
    int unique=0,occur = 0;
    for(int i = 0; i < str.length(); i++){
        alphabet[str[i]-'a']++;
    }
    for(int i = 0; i < 26; i++){
        if(alphabet[i] == 1) unique++;
        if(alphabet[i] >= 2) occur+=2;
    }
    
    // cout << unique << " " << occur << endl;
    cout << occur/2 + unique/2 << endl;
    
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}


