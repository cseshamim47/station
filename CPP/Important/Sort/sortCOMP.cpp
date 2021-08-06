//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
ll cnt;
struct student{
    string name;
    int roll;
    bool status;
};

// 4,2,1,5,3,6
bool comp(int x, int y);
void bubble_sort(vector<int> &v);
void intSort();
void builtInPopSort();

void bin(int n){
    string str = "";
    for(int i = 1 << 30; i > 0; i/=2){
        if(n & i){
            str += "1";
            cnt++;
        }
        else if(cnt) str += "0";
    }
    cout << str << endl;
    cnt = 0;
    // cout << str.length() << endl;
}

void builtInPopSort();

int main()
{
    // intSort();
    
    // int n = 44;
    // bin(n);
    builtInPopSort();
    
}

void builtInPopSort(){
    vector<int> v{4,2,1,5,3,6};
    bubble_sort(v);
    cout << endl;
    for(auto it : v){
          cout << it << " "; 
          //bin(it);
        //   string str = bitset<32>(it).to_string();
        //   cout << stoll(str) << endl;
          cout << __builtin_popcount(it) << endl;
    }

}

void intSort(){
    vector<int> v{4,2,1,5,3,6};
      bubble_sort(v);

      for(auto it : v) cout << it << " ";
}
void bubble_sort(vector<int> &v){
    for(int i = 0; i < v.size(); i++){
        for(int j = 1; j < v.size(); j++){
            if(!comp(v[j-1],v[j])) swap(v[j], v[j-1]);  
        }
    }
}

bool comp(int x, int y){
    
    // { // even odd accending
    //     if(x % 2 == 0 && y % 2 == 1) return true;
    //     if(x % 2 == 1 && y % 2 == 0) return false;
    //     return x<y;
    // }
    if(__builtin_popcount(x) == __builtin_popcount(y)){
        if(x > y) return true;
    }
    if(__builtin_popcount(x) > __builtin_popcount(y)) return true;    
    return false;
    
}


