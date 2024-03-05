//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;

int main()
{
    int size;
    cin >> size;
    vector<int> v(size);

    for (int i = 0; i < size; i++){
        int x; 
        cin >> x;
        v[i] = x;
    }

    for (int i = 0; i < size-1; i++){
        int cur = i;
        for (int j = i+1; j < size; j++){
            if(v[cur] > v[j]) cur = j;
        }
        if(v[cur] < v[i]) swap(v[cur],v[i]);
    }

    for(auto x : v) cout << x << " ";
    

    
    

}