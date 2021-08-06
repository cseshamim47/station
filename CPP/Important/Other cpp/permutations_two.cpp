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
vector<vector<char>> ans;

void permutation(vector<char> str, int idx){
    if(idx == str.size()){
        ans.push_back(str);
        return;
    }else{
        for(int i = idx; i < str.size(); i++){
            if(i != idx and str[i] == str[idx]) continue;
            swap(str[i],str[idx]);
            permutation(str,idx+1);
            // swap(str[i],str[idx]);
        }
    }
}

int main()
{
      //        Bismillah
     // int t;   cin >> t;   w(t);
    cls
    cout << "Enter size : ";
    int x; cin >> x;
    vector<char> input(x);
    for(auto &i : input)
        cin >> i;
        
    sort(input.begin(), input.end());
    // permutation(input,0);
    do{
        ans.push_back(input);
    }while(next_permutation(input.begin(), input.end()));

    cout << "Output : " << endl;
    for(auto &x : ans){
        for(auto &y : x)
            cout << y;
    cout << " ";
    }


}