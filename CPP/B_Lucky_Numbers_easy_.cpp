//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){}

bool superLucky(string &str){
    ll seven=0,four=0,i=0;
    while(i < str.size()){
        if(str[i] == '7') seven++;
        else four++;
        i++;
        cnt++;
    }
    return four == seven;
}

vector<ll>luckynumbers;
void genLuckyNumbers(string &str,ll &size){
    cnt++;
    if(str.size() > size) return;
    if(str.size() > 0 && superLucky(str)) luckynumbers.push_back(stoll(str));
    
    str += "4";
    genLuckyNumbers(str,size);
    str.pop_back();


    str += "7";
    genLuckyNumbers(str,size);
    str.pop_back();
}

// TC(n)
int main()
{
    int n;
    cin >> n;
    ll size = 10;
    string str = "";
    genLuckyNumbers(str,size);
    sort(luckynumbers.begin(),luckynumbers.end());
    for(auto it : luckynumbers){
        if(it >= n){
            cout << it << endl;
            break;
        }
    }
    cout << cnt << endl;
    cout << luckynumbers.size() << endl;
}