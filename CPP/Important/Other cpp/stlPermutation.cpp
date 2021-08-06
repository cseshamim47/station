//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }
int cnt;

void solve(){}

int main()
{
      //        Bismillah
     // int t;   cin >> t;   w(t);
    // cls

    string str;
    cin >> str;

    vector<string> ans;
    sort(str.begin(),str.end());
    do{
        ans.push_back(str);
    }while(next_permutation(str.begin(),str.end()));

    vector<long long> v;
    for(auto &i : ans){
        v.push_back(stoll(i));
        cout << i << " ";
    }

    cout << endl << endl;
    for(int i = 1; i < v.size(); i++){
        cout  << v[i] << " - " << v[0] << "  = " << v[i]-v[0] << "  ---> " << i+1 <<  endl;
        // cout << v[0] << " - " << v[i] << "  = " << v[i-1]/9 << endl;
    }

}